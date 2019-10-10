import axios from 'axios'
import { SubmissionError } from 'redux-form'

axios.defaults.baseURL = 'http://baldininkams.test/api/admin'

export const fetchCategories =  async() => {
    try{
        const response =  await axios.get('/categories')
        return response.data.data
    } catch(error) {
        console.log('api error- ', error)
    }
}

export const getCategory =  async( id ) => {
    console.log('api get category',id)
    try{
        const response =  await axios.get(`/categories/${id}`)
        return response.data.data
    } catch(error) {
        console.log('api error- ', error)
    }
}

export const createCategory = async (cat) => {
    try{
        const response =  await axios.post('/categories', cat)
        return response.data.data
    } catch(error) {
        console.log(error)
    }
}


export const deleteCategory = async (id) => {
    console.log('api',id)
    const {data} =  await axios.delete(`/categories/${id}`)
    console.log('res',data)
    return data
}

export const updateCategory = async (id, category) => {
    // try{
    //     const response =  await axios.patch(`/categories/${id}`, category)
    //     console.log('status', response)
    //     return response
    // } catch(error) {
    //     console.log('error is: ', error.response.data)
    //     throw new SubmissionError({
    //         parent_id: "!!!!!!",
    //         _error: "Submission error!"
    //     })
    // }
    await axios.patch(`/categories/${id}`, category)
        .then(response)
        // .catch(error => {
        //     // how you pass server-side validation errors back is up to you
        //     if (error.validationErrors) {
        //         throw new SubmissionError(error.validationErrors)
        //     } else {
        //         // what you do about other communication errors is up to you
        //     }
        // })

        .catch(error => {

            throw new SubmissionError({
                password: 'Wrong password',
                error: 'Login failed!',
            });
        });



}



