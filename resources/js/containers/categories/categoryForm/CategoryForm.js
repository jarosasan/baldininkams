import React from 'react'
import { Field, reduxForm, SubmissionError} from "redux-form";
import {getCategories} from "../../../selectors"
import {createCategory, fetchCategories} from "../../../actions/index";
import {connect} from "react-redux";
import * as R from 'ramda';
import validate from './validate'

// const createRenderer = render => ({input, label, type, name, meta: { touched, error }, ...rest}) => (
//     <div>
//         <label>{label}</label>
//         {render(input, label, name, type, rest)}
//             {touched && error &&
//             <div className="invalid-feedback" >
//                 {error}
//             </div>
//             }
//     </div>
// )

const createRenderer = render => ({ input, meta, label, name, type, ...rest }) =>
    <div className={ meta.error && meta.touched ? 'field error' : 'field'} >
        <label>
            {label}
        </label>
        {render(input, label, name, type, rest)}
        {meta.error &&
        meta.touched &&
        <div className="ui pointing red basic label">
            {meta.error}
        </div>
        }
    </div>


const RenderInput = createRenderer((input, label, name, type) =>
    <input {...input} name={name} placeholder={label} type={type} label={label}/>
)

const RenderSelect = createRenderer((input, label, name, type, { children }) =>
    <select {...input} name={name} label={label} className='ui dropdown'>
        {children}
    </select>
)


let CategoryFormFunc = ({categories, handleSubmit, submitting, createCategory}) =>
    // const {categories, handleSubmit, submitting, createCategory} = props
    // console.log(props)


       <form onSubmit={handleSubmit(createCategory)} className="ui large form">
           <div className='two fields'>
               <Field
                   name="parent_id"
                   label="Parent Category"
                   component={RenderSelect}>
                   <option value='' />
                   <option value="0">Main Category</option>
                   {categories.map(category =>
                       <option key={category.id} value={category.id}>
                           {category.category_name}
                       </option>
                   )}
               </Field>
               <Field
                   label="New Category"
                   name="category_name"
                   type="text"
                   component={RenderInput}
               />
           </div>
           <button type="submit" disabled={submitting} className='ui submit button' >
               Create
           </button>
       </form>




const mapStateToProps = state => ({
    categories: getCategories(state),
})

const mapDispatchToProps = {
    fetchCategories,
    createCategory
}

CategoryFormFunc = R.compose(connect(mapStateToProps, mapDispatchToProps),
reduxForm({
    form: "categoryForm",
    destroyOnUnmount: false,
    validate,
    // onSubmit: dispatch => console.log(dispatch),
    onSubmit: values => createCategory(values),
}))(CategoryFormFunc)

export default CategoryFormFunc

