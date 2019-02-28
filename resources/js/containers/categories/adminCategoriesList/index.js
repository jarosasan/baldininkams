import React, {Component} from 'react'
import * as R from 'ramda'
import {connect} from 'react-redux'
import {getCategories} from "../../../selectors"
import {deleteCategory, fetchCategories} from "../../../actions/index"




class CategoriesList extends Component  {

    constructor(props, context) {
        super(props, context);
        props.fetchCategories() ;
        this.categoryChildren = this.categoryChildren.bind(this)
        this.deleteCategory = this.deleteCategory.bind(this)
    }


    categoryChildren = (categories, id) => {
        return  R.filter(R.propEq('parent_id', id))(categories)
    }

    deleteCategory = (id) => {
        this.props.deleteCategory(id)
    }


    renderCategory = (category, index) => {
        const {categories} = this.props
        return (
                <div className='item' key={index}>
                    <i className="folder icon"></i>
                    <div className="ui content">
                        <div className="left floated content">
                            {category.category_name}
                        </div>
                        <div className="right floated content">
                            <div className="ui mini horizontal divided list">
                                <div className='item' >
                                    <i className=" blue edit outline icon"></i></div>
                                {(R.length(this.categoryChildren(categories, category.id))===0?
                                    <div className='item' onClick={() => this.deleteCategory(category.id)}>
                                        <i className="red trash alternate outline icon"></i>
                                    </div>: '')}
                            </div>
                        </div>

                    </div>

                    {(R.length(this.categoryChildren(categories, category.id))>0 ? this.renderingTreeLevel(this.categoryChildren(categories, category.id)) : '')}
                </div>
        )
    }

    renderCategoryLevel = (categories) => {
        return (
            <div className='ui list'>
                {categories.map(category=> this.renderCategory(category, category.id))}
            </div>
        )
    }

    renderingTreeLevel = (categories) => {
        const items = this.categoryChildren(categories, 0)
        const cat = R.length(items)>0 ? items : categories

        return (
            this.renderCategoryLevel(cat)
        )
    }

    render () {
    const {categories }= this.props
        return (
            <div className='ui grid'>
                {this.renderingTreeLevel(categories)}
            </div>
        )
    }

}

const mapStateToProps = state => ({
    categories: getCategories(state),
})

const mapDispatchToProps = {
    fetchCategories,
    deleteCategory
}

export default
    connect(mapStateToProps, mapDispatchToProps)
(CategoriesList)


