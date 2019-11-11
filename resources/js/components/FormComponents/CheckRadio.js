import React, {Component} from 'react'
import ReactDom from 'react-dom'

import { Form, Radio } from 'semantic-ui-react'

class CheckRadio extends Component {
    constructor(props){
        super(props)
        this.state = {
            value:''
        }
    }
    handleChange = (e, { value }) => this.setState({ value })
    render() {
        return (
            <Form.Group>
                <Radio
                    label='Siulo'
                    name='type'
                    value={1}
                    checked={this.state.value === 1}
                    onChange={this.handleChange}
                />
                <Radio
                    label='Ieško'
                    name='type'
                    value={2}
                    checked={this.state.value === 2}
                    onChange={this.handleChange}
                />
            </Form.Group>
        )
    }
}

export default CheckRadio

if (document.getElementById('radiobox')) {
    const component = document.getElementById('radiobox');
    ReactDom.render(<CheckRadio />, component);
}


