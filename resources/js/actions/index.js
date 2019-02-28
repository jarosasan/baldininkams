import {
    FETCH_CATEGORIES_START,
    FETCH_CATEGORIES_SUCCESS,
    FETCH_CATEGORIES_FAILURE,
    DELETE_CATEGORY_START,
    DELETE_CATEGORY_SUCCESS,
    DELETE_CATEGORY_FAILURE,
    CREATE_CATEGORY_START,
    CREATE_CATEGORY_SUCCESS,
    CREATE_CATEGORY_FAILURE
} from '../actionTypes'

import {
    fetchCategories as fetchCategoriesApi,
    deleteCategory as deleteCategoryApi,
    createCategory as createCategoryApi
} from '../api/index'

export const fetchCategories = () => async (dispatch, getState) => {
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

export const createCategory = (category) => async (dispatch, getState) => {
    console.log(category)
    console.log(getState())
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

export const deleteCategory = id => dispatch => {
    dispatch({ type: DELETE_CATEGORY_START })
    try {
        console.log('delete', id)
        const res = deleteCategoryApi(id)
        console.log('delete', res)
        dispatch({
            type: DELETE_CATEGORY_SUCCESS,
            payload: id
        })
    }catch(err) {
        dispatch({
            type: DELETE_CATEGORY_FAILURE,
            payload: err,
            error: true
        })
    }
}
