const validate = values => {
    // IMPORTANT: values is an Immutable.Map here!
    const errors = {}
    if (!values.category_name) {
        errors.category_name = 'Required'
    } else if (values.category_name &&values.category_name.length < 3) {
        errors.category_name = 'Must be 3 characters or more'
    }
    if (!values.parent_id) {
        errors.parent_id = 'Required'
    }

    // if (!values.get('email')) {
    //     errors.email = 'Required'
    // } else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(values.get('email'))) {
    //     errors.email = 'Invalid email address'
    // }
    // if (!values.get('age')) {
    //     errors.age = 'Required'
    // } else if (isNaN(Number(values.get('age')))) {
    //     errors.age = 'Must be a number'
    // } else if (Number(values.get('age')) < 18) {
    //     errors.age = 'Sorry, you must be at least 18 years old'
    // }
    return errors
}

export default validate
