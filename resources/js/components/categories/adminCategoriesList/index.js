import React, {Component} from 'react'
import _ from 'lodash'
import {connect} from 'react-redux'
import {deleteCategory, fetchCategory} from "../../../actions/index"
import ListItem from "./ListItem"
import {categoryChildren} from "../../../selectors"


class CategoriesList extends Component {

    constructor(props) {
        super(props)
        this.state = {
            toggledComponents: []
        }
    }

    deleteCategory = (id) => {
        this.props.deleteCategory(id)
    }

    onClick = (index) => {
        if (_.includes(this.state.toggledComponents, index)) {
            this.setState(state => {
                const toggledComponents = _.filter(state.toggledComponents, (i) => i !== index)

                return {
                    toggledComponents
                }
            })
        } else {
            this.setState(state => {
                const toggledComponents = [...state.toggledComponents, index]
                return {
                    toggledComponents
                }
            })
        }
    }

    renderList = (categories, id) => {
        const items = categoryChildren(categories, id)
        const cat = _.size(items) > 0 ? items : null
        return (
            <div className='ui list'>
                {cat && cat.map(category => {
                        const items = categoryChildren(categories, category.id)
                        const icon = _.size(items) > 0 ? _.includes(this.state.toggledComponents, category.id) ? ' folder open list-item-icon-open ' : ' folder list-item-icon' : ' file'
                        const deleted = _.size(items) > 0 ? false : true
                        const children = _.size(items) > 0 && _.includes(this.state.toggledComponents, category.id) ? this.renderList(categories, category.id) : null

                        return (
                            <ListItem
                                category={category}
                                key={category.id}
                                index={category.id}
                                className={icon}
                                categoryes={categories}
                                deleted={deleted}
                                onClick={this.onClick}
                                disabled={deleted}
                                children={children}
                                deletecategory={this.deleteCategory}

                            />
                        )
                    }
                )}
            </div>
        )
    }

    render() {
        const {categories} = this.props
        return this.renderList(categories, 1)
    }
}

const mapDispatchToProps = {
    deleteCategory,
    fetchCategory,
}

export default connect(null, mapDispatchToProps)
(CategoriesList)


