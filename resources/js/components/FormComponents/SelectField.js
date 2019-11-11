import React, {Component} from 'react'
import ReactDom from 'react-dom'
import { Form, Select} from 'semantic-ui-react'
import {arrayToSelect} from '../../selectors'

class SelectField extends Component {
    constructor(props){
        super(props)
    }
    render() {
        const options = arrayToSelect( this.props.data)

        console.log(options)
            return (
                <Form.Group>
                    <Select
                        label='Miestas'
                        name='city'
                        options={options}
                        placeholder='Pasirinkite miestą'
                    />
                </Form.Group>
            )
        }
}

export default SelectField
if (document.getElementById('select-field')) {

    const component = document.getElementById('select-field');
    let data = document.getElementById('select-field').attributes.data;
    console.log(data)
    ReactDom.render(<SelectField data={data}/>, component);
}


