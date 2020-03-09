import React,{ Component } from 'react';
import {render} from 'react-dom';
import { BrowserRouter as Router, Switch, Route} from "react-router-dom";
import 'bootstrap/dist/css/bootstrap.css';
// import ReactDOM from "react-dom";
import home from './Home';
import fashion_tex from './FashionTexStyleDepartment';
import career from './Career';
import calendar from './Calendar';
import appointment from './Appointment';
import fashion_tex_sales from './FashionTexSales';
import fashion_tex_social_media from './FashionTexSocialMedia'

class LandingPage extends React.Component {
    render() {
        return (
            <div>
                <Switch>
                    <Route exact path="/" component={home} />
                    <Route path="/career" component={career}/>
                    <Route path="/fashion_tex" component={fashion_tex}/>
                    <Route path="/calendar" component={calendar}/>
                    <Route path="/appointment" component={appointment}/>
                    <Route path="/fashion_tex_social_media" component={fashion_tex_social_media}/>
                    <Route path="/fashion_tex_style" component={fashion_tex_sales}/>
                </Switch>
            </div>
        );
    }
}
export default class DashboardRouting extends Component{
    render(){
        return (
            <Router>
                <Route component={LandingPage} />
            </Router>
        );
    }
}
render(<DashboardRouting/>,document.getElementById('root'));

