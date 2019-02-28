
import React from 'react'
import Sidebar from '../sidebar/index'


const Layout = ({children}) => (
        <div className='ui two column padded grid'>
            <div className='stretched row'>
                <div className='two wide column'>
                    <Sidebar />
                </div>
                <div className='column'>
                    {children}
                </div>
            </div>
        </div>
)

export default Layout
