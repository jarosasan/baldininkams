import {reset} from 'redux-form'
import {history} from '../configureStore'
import { SubmissionError } from 'redux-form'
import {
    FETCH_CATEGORIES_START,
    FETCH_CATEGORIES_SUCCESS,
    FETCH_CATEGORIES_FAILURE,
    FETCH_CATEGORY_START,
    FETCH_CATEGORY_SUCCESS,
    FETCH_CATEGORY_FAILURE,
    DELETE_CATEGORY_START,
    DELETE_CATEGORY_SUCCESS,
    DELETE_CATEGORY_FAILURE,
    CREATE_CATEGORY_START,
    CREATE_CATEGORY_SUCCESS,
    CREATE_CATEGORY_FAILURE,
    UPDATE_CATEGORY_START,
    UPDATE_CATEGORY_SUCCESS,
    UPDATE_CATEGORY_FAILURE
} from '../actionTypes'

import {
    fetchCategories as fetchCategoriesApi,
    getCategory as getCategoryApi,
    deleteCategory as deleteCategoryApi,
    createCategory as createCategoryApi,
    updateCategory as updateCategoryApi,
} from '../api'

export const fetchCategories = () => async (dispatch) => {
    dispatch({ type: FETCH_CATEGORIES_START })
    try {
        const categories = await fetchCategoriesApi()
        dispatch({
            type: FETCH_CATEGORIES_SUCCESS,
            payload: categories
        })
    }catch(err) {
        dispatch({
            type: FETCH_CATEGORIES_FAILURE,
            payload: err,
            error: true
        })
    }
}
 export const fetchCategory = (id) => async (dispatch) => {
    dispatch({ type: FETCH_CATEGORY_START })
    try {
        const category = await getCategoryApi(id)
        dispatch({
            type: FETCH_CATEGORY_SUCCESS,
            payload: category
        })
    }catch(err) {
        dispatch({
            type: FETCH_CATEGORY_FAILURE,
            payload: err,
            error: true
        })
    }
}

export const createCategory = (category) => async (dispatch) => {
    dispatch({ type: CREATE_CATEGORY_START })
    try {
        await createCategoryApi(category)
        const categories = await fetchCategoriesApi()
        dispatch({
            type: CREATE_CATEGORY_SUCCESS,
            payload: categories
        })
    }catch(err) {
        dispatch({
            type: CREATE_CATEGORY_FAILURE,
            payload: err,
            error: true
        })
    }
}

export const deleteCategory = id => async dispatch => {
    dispatch({ type: DELETE_CATEGORY_START })
    try {
        await deleteCategoryApi(id)
        dispatch({
            type: DELETE_CATEGORY_SUCCESS,
            payload: id
        })
        history.push('/admin/categories')
    }catch(err) {
        dispatch({
            type: DELETE_CATEGORY_FAILURE,
            payload: err,
            error: true
        })
    }
}

export const updateCategory = (id, category) => async dispatch => {
    dispatch({ type: UPDATE_CATEGORY_START })

        const cat =  await updateCategoryApi(id, category)
        if(!cat.errors){
            dispatch({
                type: UPDATE_CATEGORY_SUCCESS,
                payload: cat.data.data
            })
            history.push('/admin/categories')
            dispatch(reset('CategoryEdit'));
        }else{
            console.log('action-error', cat)
            dispatch({
                type: UPDATE_CATEGORY_FAILURE,
                error: true
            })
        }

}
