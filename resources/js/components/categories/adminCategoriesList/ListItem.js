import React from 'react'
import {Link} from "react-router-dom"
import * as PropTypes from "prop-types";
import classNames from 'classnames'


const ListItem = ({categories, category, index, className, onClick, deleted, disabled, children, deletecategory}) => {

    const classes = classNames(
        'icon',
        'list-item',
        className
    )

    const onClickAction = index => {
        if (!disabled) {
            return onClick(index)
        }
    }

    return (
        <div className='item' disabled={disabled} key={index}>
            <i
                className={classes}
                onClick={() => onClickAction(index)}
            ></i>
            <div className="ui content">
                <div className="left floated content">
                    <h3 className="ui large">
                        {category.category_name}
                    </h3>
                </div>
                <div className="right floated content">
                    <div className="ui horizontal divided list">
                        <Link className='item' to={`/admin/categories/edit/${category.id}`}>
                            <i className="ui large blue edit outline icon"></i>
                        </Link>
                        {deleted &&
                        <Link className='item' to={`/admin/categories/delete/${category.id}`}>
                            <i className="ui large red trash alternate outline icon"></i>
                        </Link>}
                    </div>
                </div>
            </div>
            {children}
        </div>
    )
}

ListItem.propTypes = {
    children: PropTypes.node,
    onClick: PropTypes.func,
    className: PropTypes.string,
    deleted: PropTypes.bool,
    categories: PropTypes.object,
    category: PropTypes.object,
    disabled: PropTypes.bool,
    index: PropTypes.number


}

ListItem.defaultProps = {
    children: 'Searching...',
    onClick: () => {},
    className: '',
    disabled: false,
    deleted: false,
}

export default ListItem
