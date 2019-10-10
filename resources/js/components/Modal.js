import React from 'react'
import ReactDom from 'react-dom'

const Modal = props => {
    return ReactDom.createPortal(
        <div onClick={props.onDisMiss} className="ui dimmer modals visible active">
            <div onClick={(e)=>e.stopPropagation()} className="ui small modal visible active">
                <div className="header">{props.title}</div>
                <div className="content">
                    <p>{props.content}</p>
                </div>
                <div className="actions">
                    {props.actions}
                </div>
            </div>
        </div>,
        document.querySelector('#modal')
    )
}

export default Modal
