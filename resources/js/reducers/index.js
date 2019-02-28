import { combineReducers } from 'redux'
import { connectRouter } from 'connected-react-router'
import { reducer as formReducer } from 'redux-form'

import categories from './categories'



export default (history) => combineReducers({
    router: connectRouter(history),
    categories: categories,
    form: formReducer
})
