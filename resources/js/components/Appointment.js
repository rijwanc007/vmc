import React,{ Component } from 'react';
import 'bootstrap/dist/css/bootstrap.css';
import Footer from './Footer';

export default class Appointment extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return(
            <div>
                <form action="/appointment_send" method="get">
                    <div className="container">
                        <br/><br/><br/>
                        <div className="row">
                            <div className="col-md-7">
                                <div className="first_text">Add Your Info</div>
                                <div className="second_text">Tell us a bit about yourself</div>
                                <br/><br/>
                                <label className="form_label_name">Name *</label>
                                <br/>
                                <input className="form_input_design" type="text" name="name" id="name"/>
                                <br/><br/>
                                <label className="form_label_name">Email *</label>
                                <br/>
                                <input className="form_input_design" type="email" name="email" id="email"/>
                                <br/><br/>
                                <label className="form_label_name">Phone Number</label>
                                <br/>
                                <input className="form_input_design" type="text" name="phone" id="number"/>
                                <br/><br/>
                                <label className="form_label_name">Add Your Message</label>
                                <br/>
                                <textarea className="form_input_design" name="message" id="message"></textarea>
                                <input type="hidden" name="day" value={this.props.location.state.day}/>
                                <input type="hidden" name="month" value={this.props.location.state.month}/>
                                <input type="hidden" name="year" value={this.props.location.state.year}/>
                                <input type="hidden" name="time" value={this.props.location.state.time}/>
                                <br/><br/>
                                <div className="require_text">* Required Info</div>
                            </div>
                            <div className="col-md-4 offset-md-1 margin_form col_right text-center">
                                <div>Airbnb Consultation</div>
                                <p>30 min | Free</p>
                                <p>{this.props.location.state.month} {this.props.location.state.day} , {this.props.location.state.year} {this.props.location.state.time}</p>
                                <p>{this.props.location.state.name}</p>
                                <button type="submit" className="next_button">Confirm Appointment</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br/><br/>
                <Footer/>
            </div>
        )
    }
}