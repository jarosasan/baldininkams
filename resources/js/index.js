import React from 'react'
import ReactDom from 'react-dom'
import {Route, Switch, Router} from 'react-router-dom'
import {Provider} from 'react-redux'
import configureStore, { history } from './configureStore'
import 'semantic-ui-css/semantic.min.css'

import Layout from './components/layout/index'
import Dashboard from './components/adminDashboard/index'
import Categories from './components/categories/index'

const store = configureStore()
ReactDom.render(
    <Provider store={store}>
        <Router history={history}>
            <Layout path='/admin'>
                <Switch>
                    <Route exact path='/admin' component={Dashboard} />
                    <Route path='/admin/categories' component={Categories}>
                    </Route>
                </Switch>
            </Layout>
        </Router>
    </Provider>,

    document.getElementById('admin')
);
