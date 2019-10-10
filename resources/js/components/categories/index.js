import React, {Component}from 'react'
import {Route, Switch} from 'react-router-dom'
import {connect} from "react-redux";
import {fetchCategories, createCategory, editCategory, updateCategory} from "../../actions";
import {getCategories, getCategory} from "../../selectors";
import CategoriesList from './adminCategoriesList/index'
import CategoryCreate from '../categoryForm/CategoryCreate'
import CategoryEdit from '../categoryForm/CategoryEdit'
import Modal from './categoryDelete/index'

class Categories extends Component{

    componentDidMount () {
        this.props.fetchCategories()
    }

    render () {
        return (
            <div className="column">
                <div className='ui huge header'>
                    Categories
                </div>
                <div className="ui divider"></div>
                <Switch>
                    <Route exact path='/admin/categories' render={(props)=><CategoryCreate {...props} categories={this.props.categories} />} />
                    <Route exact path='/admin/categories/edit/:id' render={(props)=><CategoryEdit {...props} categories={this.props.categories} />} />
                    <Route exact path='/admin/categories/delete/:id' component={Modal} />
                </Switch>
                    <div className="ui divider"></div>
                <CategoriesList categories={this.props.categories}/>
            </div>
        )
    }
}

const mapStateToProps = state => ({
    categories: getCategories(state),
})

const mapDispatchToProps = {
    fetchCategories
}

export default
connect(mapStateToProps, mapDispatchToProps)
(Categories)


