import React, {Fragment, Component} from 'react'
import Modal from '../../Modal'
import {Link} from 'react-router-dom'
import {history} from '../../../configureStore'
import {connect} from 'react-redux'
import {fetchCategory, deleteCategory} from "../../../actions";

class DeleteCategory extends Component {
    componentDidMount(){
        this.props.fetchCategory(this.props.match.params.id)
    }

    renderActions() {
        const {id} = this.props.match.params
        return (
            <Fragment>
                <div onClick={()=>this.props.deleteCategory(id)} className="ui button negative">Delete</div>
                <Link
                    to="admin/categories"
                    className="ui cancel button"
                >
                    Cancel
                </Link>
            </Fragment>
        )
    }
    renderContent(){
        if(!this.props.category){
           return  "Are you sure you want to delete this category?"
        }

        return `Are you sure you want to delete ${this.props.category.category_name} category?`
    }

    render() {
        return (
            <Modal
                title="Delete Category"
                content={this.renderContent()}
                actions={this.renderActions()}
                onDisMiss={() => history.push('admin/categories')}
            />
        )
    }
}

const mapStateToProps = (state, ownProps)=>{
    return {category: state.categories[ownProps.match.params.id]}
}

const mapDispatchToProps = {
    deleteCategory,
    fetchCategory
}

export default connect(mapStateToProps, mapDispatchToProps)(DeleteCategory)
