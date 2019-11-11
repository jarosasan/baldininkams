import React from 'react'
import * as PropTypes from 'prop-types';


const createRenderer = render => ({input, name, label, type, meta, ...attres}) =>
    <div className={meta.error && meta.touched ? 'ui field large error' : 'ui field large'}>
        <label>
            {label}
        </label>
        {render(input, label, name, type, attres)}
        {meta.error &&
        meta.touched &&
        <div className="ui pointing red basic label">
            {meta.error}
        </div>
        }
    </div>


createRenderer.propTypes = {
    meta: PropTypes.object,
    label: PropTypes.string,
    name: PropTypes.string,
    type: PropTypes.string,
}

createRenderer.defaultProps = {
    meta: {},
    label: '',
    name: '',
    type: '',
}

export const RenderInput = createRenderer((input, label, name, type) =>
    <input {...input} name={name} placeholder={label} type={type} label={label} height={3}/>
)
export const RenderHiddenInput = (input, name) =>
    <input {...input} name={name}/>


export const RenderSelect = createRenderer((input, label, name, type, {children}) =>
    <select {...input} name={name} label={label} className='ui search selection dropdown' height={3}>
        {children}
    </select>
)
