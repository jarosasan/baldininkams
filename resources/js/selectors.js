import * as R from 'ramda'

export const getCategories = state => R.values(state.categories)

export const categoryChildren = (state, id) => {
    return  R.filter(R.propEq('parent_id', id))(state)
}

export const categoryByLevel = (state, level) => {
    return  R.filter(R.propEq('level', level), state.categories)
}

export const levelsCount = state => {
    let a = R.map(item=>R.prop('level', item))(state.categories)
    return R.reduce(R.max(), 1, a)
}
