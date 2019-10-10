
import React from 'react'
import Sidebar from '../sidebar/index'


const Layout = ({children}) => (
        <div className='ui fluid container'>
            <div className="ui top fixed menu">
                <div className="item">

                </div>
                <a className="item">Features</a>
                <a className="item">Testimonials</a>
                <a className="item">Sign-in</a>
            </div>
            <div className='ui two column grid'>
                <div className='ui three wide column'>
                    <Sidebar />
                </div>
                <div className='ui column cont'>
                    {children}
                </div>
            </div>
        </div>
)

export default Layout
