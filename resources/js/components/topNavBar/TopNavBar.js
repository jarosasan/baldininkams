import _ from "lodash";
import React, { Component, Fragment } from "react";
import { render } from "react-dom";
import 'semantic-ui-css/semantic.min.css';
import {
    Container,
    Icon,
    Image,
    Menu,
    Sidebar,
    Responsive,
    Segment,
    Header
} from "semantic-ui-react";

const NavBarMobile = ({
  rightItems,
  visible,
  onPusherClick,
  onToggle,
  children
  }) => (
    <Sidebar.Pushable>
        <Sidebar
            as={Menu}
            animation='push'
            direction='right'
            vertical
            visible={visible}
            width='thin'
        >
            {_.map(rightItems, item => <Menu.Item {...item} />)}
        </Sidebar>
        <Sidebar.Pusher
            onClick={onPusherClick}
        >
            <Menu pointing secondary>
                <Menu.Item>
                    <Image size="mini" src="https://react.semantic-ui.com/logo.png" />
                </Menu.Item>
                <Menu.Item onClick={onToggle} position="right">
                    <Icon name='bars' />
                </Menu.Item>
            </Menu>
            {children}
        </Sidebar.Pusher>
    </Sidebar.Pushable>
)


const NavBarDeskTop = ({rightItems})=>(
    <Menu pointing secondary>
        <Menu.Item>
            <Image size="mini" src="https://react.semantic-ui.com/logo.png" />
        </Menu.Item>
        <Menu.Menu position="right">
            {_.map(rightItems, item => <Menu.Item href={item.route}>{item.name}</Menu.Item>)}
        </Menu.Menu>
    </Menu>
)

const NavBarChildren = ({ children }) => (
    <Container style={{ marginTop: "5em" }}>{children}</Container>
);



class NavBar extends Component {
    state = {
        visible: false
    }

    handlePusher = () => {
        const { visible } = this.state;

        if (visible) this.setState({ visible: false });
    };

    handleToggle = () => this.setState({ visible: !this.state.visible });

    render (){
        const { children, rightItems } = this.props;
        const { visible } = this.state;

        return (
            <div className="ui container">
                <Responsive {...Responsive.onlyMobile}>
                    <NavBarMobile
                        onPusherClick={this.handlePusher}
                        onToggle={this.handleToggle}
                        rightItems={rightItems}
                        visible={visible}>
                        <NavBarChildren>{children}</NavBarChildren>
                    </NavBarMobile>
                </Responsive>
                <Responsive {...Responsive.onlyComputer}>
                    <NavBarDeskTop rightItems={rightItems}>
                        <NavBarChildren>{children}</NavBarChildren>
                    </NavBarDeskTop>
                </Responsive>
            </div>
        )
    }
}

// const rightItems = [
//     { as: "a", content: "Login", key: "login" },
//     { as: "a", content: "Register", key: "register" }
// ];


const App = () => (
    <NavBar rightItems={[this.props.logIn, this.props.register]} />
);
export default App

