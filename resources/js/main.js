// import _ from "lodash";
import React, { Component } from "react";
import NavBar from "./components/topNavBar/TopNavBar"
import { render } from "react-dom";
// import {
//     Container,
//     Icon,
//     Image,
//     Menu,
//     Sidebar,
//     Responsive
// } from "semantic-ui-react";



//
// const NavBarMobile = ({
//                           children,
//                           leftItems,
//                           onPusherClick,
//                           onToggle,
//                           rightItems,
//                           visible
//                       }) => (
//     <Sidebar.Pushable>
//         <Sidebar
//             as={Menu}
//             animation="overlay"
//             icon="labeled"
//             inverted
//             items={leftItems}
//             vertical
//             visible={visible}
//         />
//         <Sidebar.Pusher
//             dimmed={visible}
//             onClick={onPusherClick}
//         >
//             <Menu fixed="top" >
//                 <Menu.Item>
//                     <Image size="mini" src="https://react.semantic-ui.com/logo.png" />
//                 </Menu.Item>
//                 <Menu.Item onClick={onToggle}>
//                     <Icon name="sidebar" />
//                 </Menu.Item>
//                 <Menu.Menu position="right">
//                     {_.map(rightItems, item => <Menu.Item {...item} />)}
//                 </Menu.Menu>
//             </Menu>
//             {children}
//         </Sidebar.Pusher>
//     </Sidebar.Pushable>
// );
//
// const NavBarDesktop = ({rightItems }) => (
//     <Menu fixed="top" >
//         <Menu.Item>
//             <Image size="mini" src="https://react.semantic-ui.com/logo.png" />
//         </Menu.Item>
//         <Menu.Menu position="right">
//             {_.map(rightItems, item => <Menu.Item {...item} />)}
//         </Menu.Menu>
//     </Menu>
// );
//
// const NavBarChildren = ({ children }) => (
//     <Container style={{ marginTop: "5em" }}>{children}</Container>
// );
//
// class NavBar extends Component {
//     state = {
//         visible: false
//     };
//
//     handlePusher = () => {
//         const { visible } = this.state;
//
//         if (visible) this.setState({ visible: false });
//     };
//
//     handleToggle = () => this.setState({ visible: !this.state.visible });
//
//     render() {
//         const { children, rightItems } = this.props;
//         const { visible } = this.state;
//
//         return (
//             <div>
//                 <Responsive {...Responsive.onlyMobile}>
//                     <NavBarMobile
//                         onPusherClick={this.handlePusher}
//                         onToggle={this.handleToggle}
//                         rightItems={rightItems}
//                         visible={visible}
//                     >
//                         <NavBarChildren>{children}</NavBarChildren>
//                     </NavBarMobile>
//                 </Responsive>
//                 <Responsive minWidth={Responsive.onlyTablet.minWidth}>
//                     <NavBarDesktop rightItems={rightItems} />
//                     <NavBarChildren>{children}</NavBarChildren>
//                 </Responsive>
//             </div>
//         );
//     }
// }
//
// const rightItems = [
//     { as: "a", content: "Login", key: "login" },
//     { as: "a", content: "Register", key: "register" }
// ];
//
// const App = () => (
//     <NavBar rightItems={rightItems}>
//
//     </NavBar>
// );
//
// render(<App />, document.getElementById("menu"));
    render( <NavBar/>, document.getElementById("top-nav-bar"))
