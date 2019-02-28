import React from 'react'

import CategoriesList from './adminCategoriesList'
import CategoryForm from './categoryForm/CategoryForm'
import {connect} from "react-redux";
import {getCategories} from "../../selectors";
import {deleteCategory, fetchCategories} from "../../actions";

const Categories = () => {

        return (
            <div className="row">
                <div className="column">
                    <div className='ui huge header'>
                        Categories
                    </div>
                    <div className="ui divider"></div>
                    <CategoryForm />
                    <div className="ui divider"></div>

                    <CategoriesList />
                </div>
            </div>
        );
}

// const mapStateToProps = (state) => ({
//     categories: getCategories(state),
// })
//
// const mapDispatchToProps = {
//     fetchCategories
// }

export default  Categories

