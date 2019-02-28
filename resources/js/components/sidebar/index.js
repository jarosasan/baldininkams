import React from 'react'
import {NavLink} from 'react-router-dom'

const SidebarAdmin = () => {
    return (
        <div className='ui inverted vertical pointing menu'>
            <NavLink
                exact
                to='/admin'
                className='item'
                activeclass='active'
            >
                Home
            </NavLink>
            <NavLink
                to='/admin/categories'
                className='item'
                activeclass='active'
            >
                Categories
            </NavLink>
        </div>
    )
}

export default SidebarAdmin;
