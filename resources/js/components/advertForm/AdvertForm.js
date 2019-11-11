import React, {Component} from 'react'
import {Field, reduxForm} from "redux-form";
import * as PropTypes from 'prop-types';
import {RenderInput, RenderSelect, RenderHiddenInput} from "../FormComponents/formFields";
import validate from './validate'


class CategoryForm extends Component {

    onSubmit = formValues => {
        this.props.onSubmit(formValues)
    }

    render() {
        const {categories, handleSubmit} = this.props
        return (
            <form onSubmit={handleSubmit(this.onSubmit)} className="ui large form">
                <div className='ui inline fields'>
                    <Field
                        className='field'
                        name="parent_id"
                        label="Parent Category"
                        component={RenderSelect}>
                        <option value=''></option>
                        {/*<option value='0' >Main Category</option>*/}
                        {categories.map(category =>
                            <option key={category.id} value={category.id}>
                                {category.category_name}
                            </option>
                        )}
                    </Field>
                    <Field
                        className='field'
                        label="Category name"
                        name="category_name"
                        type="text"
                        component={RenderInput}
                    />
                    <Field
                        className='field'
                        label="Slug"
                        name="slug"
                        type="text"
                        component={RenderInput}
                    />
                    <Field
                        name="id"
                        type="hidden"
                        component={RenderHiddenInput}
                    />
                </div>
            </form>
        )
    }
}

CategoryForm.propTypes = {
    initialValues: PropTypes.object,
    categories: PropTypes.array,
    handleSubmit: PropTypes.func,
    reset: PropTypes.func,
    pristine: PropTypes.bool,
    dirty: PropTypes.bool,
    submitting: PropTypes.bool
};

export default CategoryForm = reduxForm({
    form: 'CategoryForm',
    validate,
    enableReinitialize: true,
    keepDirtyOnReinitialize: true,

})(CategoryForm)





