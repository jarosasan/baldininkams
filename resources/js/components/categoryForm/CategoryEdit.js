import React, {Component} from 'react'

import {connect} from "react-redux";
import {Link} from "react-router-dom"
import {submit, reset} from "redux-form"
import {updateCategory, fetchCategory} from "../../actions/index";
import CategoryForm from "./CategoryForm"
import Button from "../Button"



class CategoryEdit extends Component {

    componentDidMount(){
        this.props.fetchCategory(this.props.match.params.id)
    }

    onSubmit = formValues => {
        this.props.updateCategory(this.props.match.params.id , formValues)
    }


    render () {
        const {submit, pristine, submitting} = this.props
        return (
            <div>
                <h2>Edit Category</h2>
                <CategoryForm
                    form="CategoryEdit"
                    initialValues={this.props.category}
                    onSubmit={this.onSubmit}
                    categories={this.props.categories}
                />
                <Button type="submit" disabled={pristine || submitting } className='submit' onClick={()=>submit("CategoryEdit")}>
                    Update category
                </Button>
                <Link to="/admin/categories" className="ui button">
                    Cancel
                </Link>
            </div>
        )
    }
}

const mapStateToProps = (state, ownProps)=>({
    category: state.categories[ownProps.match.params.id]
})

const mapDispatchToProps = {
    fetchCategory,
    updateCategory,
    submit,
    reset
}

export default  connect(mapStateToProps, mapDispatchToProps)(CategoryEdit)



