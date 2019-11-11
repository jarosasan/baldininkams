import React, {Component} from 'react'
import {createCategory} from "../../actions/index";
import {connect} from "react-redux";
import {submit, reset} from "redux-form"
import CategoryForm from "./CategoryForm"
import Button from "../Button"


class CategoryCreate extends Component {

    onSubmit = (formValues) => {
        this.props.createCategory(formValues).then(()=>
        this.props.reset("CategoryCreate"))
    }

    render () {
        const  {submitting, pristine, submit, reset}= this.props
        return (
            <div>
                <h2>Create Category</h2>
                <CategoryForm
                    form="CategoryCreate"
                    onSubmit={this.onSubmit}
                    categories={this.props.categories}
                    initialValues={{category_name:'', parent_id: null, slug: null}}
                />
                <Button type="submit" disabled={pristine || submitting } className='submit' onClick={()=>submit("CategoryCreate")}>
                    Create category
                </Button>
                <Button type="button" disabled={pristine || submitting} onClick={()=>reset("CategoryCreate")}>
                    Cancel
                </Button>
            </div>

        )
    }
}

const mapDispatchToProps = {
    createCategory,
    submit,
    reset
}

export default connect(null, mapDispatchToProps)(CategoryCreate)





