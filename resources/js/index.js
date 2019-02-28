require('./bootstrap');
import React from 'react'
import ReactDom from 'react-dom'
import {Route, Switch} from 'react-router'
import {Provider, ReactReduxContext} from 'react-redux'
import { ConnectedRouter } from 'connected-react-router'
import configureStore, { history } from './configureStore'

import Layout from './components/layout/index'
import Dashboard from './containers/adminDashboard/index'
import Categories from './containers/categories/index'


const store = configureStore()
ReactDom.render(
   <Provider store={store} context={ReactReduxContext}>
       <ConnectedRouter history={history} context={ReactReduxContext}>
           <Layout path='/admin'>
               <Switch>
                    <Route exact path='/admin' component={Dashboard} />
                    <Route path='/admin/categories' component={Categories} />
               </Switch>
           </Layout>
       </ConnectedRouter>
   </Provider>,

    document.getElementById('admin')
);
