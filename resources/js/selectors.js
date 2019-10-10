import _ from 'lodash'

export const getCategories = state => _.values(state.categories)
export const getCategory = (state, id) => _.values(_.find(state.categories, {'id':id}))

export const categoryChildren = (categories, id) => {
        return  _.filter(categories, {'parent_id': id})
    }
//
// export const categoryByLevel = (state, level) => {
//     return  R.filter(R.propEq('level', level), state.categories)
// }
//
// export const levelsCount = state => {
//     let a = R.map(item=>R.prop('level', item))(state.categories)
//     return R.reduce(R.max(), 1, a)
// }
