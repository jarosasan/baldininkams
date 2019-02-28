import axios from 'axios'
import categories from './mockCategories'

export const fetchCategories =  async() => {
    try{
        const response =  await axios.get('http://baldininkams.test/api/admin/categories')
        console.log(response)
        return response.data
    } catch(error) {
        console.log(error)
    }
}

export const createCategory = async (category) => {
    try{
        const response =  await axios.post('http://baldininkams.test/api/admin/categories', category)
        console.log(response)
        return response.data
    } catch(error) {
        console.log(error)
    }
}


export const deleteCategory = async (id) => {
    console.log('api',id)
    const {data} =  await axios.delete('http://baldininkams.test/api/admin/categories/'+id)
    console.log('res',data)
    return data
}

// export const fetchCategories = async () => {
//     return new Promise((resolve, reject) => {
//         resolve(categories)
//     })
// }
