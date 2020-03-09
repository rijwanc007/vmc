import React,{ Component } from 'react';
import moment from 'moment';
import {Link} from "react-router-dom";
import Footer from './Footer';

import previous from '../../../public/picture/2.png';
import next from '../../../public/picture/1.png';
// import facebook from "../../../public/picture/fb-pink-1.png";
// import insta from "../../../public/picture/insta-pink-1.png";
// import lookbook from "../../../public/picture/lookbook-pink1.png";
// import snapchat from "../../../public/picture/snapchat-pink-1.png";
// import pintrst from "../../../public/picture/pintrst-pink-1.png";

export default class Calendar extends Component {
    constructor(props) {
        super(props);
        this.state ={
            dateContext: moment(),
            today: moment(),
            showMonthPopup: false,
            showYearPopup: false,
            selectedDay: null,
            userSelectDay:moment().get('date'),
            userSelectMonth:moment().format('MMMM'),
            userSelectYear:moment().format('Y'),
            userSelectedTime:null,
            name:null,
            button:true,
        }
    }
    weekdays = moment.weekdays();
    weekdaysShort = moment.weekdaysShort();
    months = moment.months();
    year = () => {
        return this.state.dateContext.format("Y");
    };
    month = () => {
        return this.state.dateContext.format("MMMM");
    };
    daysInMonth = () => {
        return this.state.dateContext.daysInMonth();
    };
    currentDate = () => {
        console.log("currentDate: ", this.state.dateContext.get("date"));
        return this.state.dateContext.get("date");
    };
    currentDay = () => {
        return this.state.dateContext.format("D");
    };
    firstDayOfMonth = () => {
        let dateContext = this.state.dateContext;
        let firstDay = moment(dateContext).startOf('month').format('d');
        return firstDay;
    };
    // month functionality start here
    nextMonth = () => {
        let dateContext = Object.assign({}, this.state.dateContext);
        dateContext = moment(dateContext).add(1, "month");
        this.setState({
            dateContext: dateContext,
            userSelectMonth:dateContext.format('MMMM'),
            userSelectYear:dateContext.format('Y'),

        });
        // this.props.onNextMonth && this.props.onNextMonth();
    };
    prevMonth = () => {
        let dateContext = Object.assign({}, this.state.dateContext);
        dateContext = moment(dateContext).subtract(1, "month");
        this.setState({
            dateContext: dateContext,
            userSelectMonth:dateContext.format('MMMM'),
            userSelectYear:dateContext.format('Y'),
        });
        // this.props.onPrevMonth && this.props.onPrevMonth();
    };
    MonthNav = () => {
        return (
            <span className="label-month">
                {this.month()}
            </span>
        );
    };
    YearNav = () => {
        return (
            <span className="label-year">
                {this.year()}
            </span>
        );
    };
    // year functionality end here

    // day functionality start here
    onDayClick = (e, day) => {
        this.setState({
                selectedDay: day,
                userSelectDay:day,
            }
        )
    };
    scheduleTime (time){
        this.setState({
            userSelectedTime:time,
            name:'Alexius A. Dorsey',
            button:false,
        });
    }
    // day functionality end here

    // digital clock functionality start here
    getTimeString() {
        const date = new Date(Date.now()).toLocaleTimeString();
        return date;
    }
    componentDidMount() {
        const _this = this;
        this.timer = setInterval(function(){
            var date = _this.getTimeString();
            _this.setState({
                time: date
            })
        },1000)
    }
    componentWillUnmount() {
        clearInterval(this.timer);
    }
    // digital clock functionality end here

    render() {
        let weekdays = this.weekdaysShort.map((day) => {
            return (
                <td key={day} className="week-day">{day}</td>
            )
        });
        let blanks = [];
        for (let i = 0; i < this.firstDayOfMonth(); i++) {
            blanks.push(<td key={i * 80} className="emptySlot">
                    {""}
                </td>
            );
        }
        let daysInMonth = [];
        for (let d = 1; d <= this.daysInMonth(); d++) {
            let className = (d == this.currentDay() ? "day current-day": "day");
            let selectedClass = (d == this.state.selectedDay ? " selected-day " : "")
            daysInMonth.push(
                <td key={d} className={className + selectedClass} >
                    <span onClick={(e)=>{this.onDayClick(e, d)}}>{d}</span>
                </td>
            );
        }
        let totalSlots = [...blanks, ...daysInMonth];
        let rows = [];
        let cells = [];
        totalSlots.forEach((row, i) => {
            if ((i % 7) !== 0) {
                cells.push(row);
            } else {
                let insertRow = cells.slice();
                rows.push(insertRow);
                cells = [];
                cells.push(row);
            }
            if (i === totalSlots.length - 1) {
                let insertRow = cells.slice();
                rows.push(insertRow);
            }
        });
        let trElems = rows.map((d, i) => {
            return (
                <tr key={i*100}>
                    {d}
                </tr>
            );
        });
        return (
            <div>
                <div className="container">
                    <br/><br/>
                    <div className="text-center head_text">Schedule Online</div>
                    <br/>
                    <div className="row">
                        <div className="col-md-2 col_left">
                            <div className="day_month">
                                <div className="left_bar_day_show text-center">{moment().get('date')}</div>
                                <div className="left_bar_month_show text-center">{moment().format('MMMM')}</div>
                            </div>
                            <div className="digital_clock text-center">{this.state.time}</div>
                        </div>
                        <div className="col-md-3">
                            <div className="calendar-container" style={this.style}>
                                <table className="calendar">
                                    <thead>
                                    <tr className="calendar-header" align="middle">
                                        <td><img src={previous} alt="previous" onClick={()=>this.prevMonth()}/></td>
                                        <td colSpan="5">
                                            <this.MonthNav />
                                            {" "}
                                            <this.YearNav />
                                        </td>
                                        <td><img src={next} alt="next" onClick={()=>{this.nextMonth()}}/></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        {weekdays}
                                    </tr>
                                    {trElems}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div className="col-md-4 offset-md-3 col_right text-center">
                            <div>Airbnb Consultation</div>
                            <p>30 min | Free</p>
                            <p>{this.state.userSelectMonth} {this.state.userSelectDay} , {this.state.userSelectYear} {this.state.userSelectedTime}</p>
                            <p>{this.state.name}</p>
                            <Link to={{
                                pathname:'/appointment',
                                state:{
                                    month:this.state.userSelectMonth,
                                    year:this.state.userSelectYear,
                                    day:this.state.userSelectDay,
                                    time:this.state.userSelectedTime,
                                    name:'Alexius A. Dorsey',
                                }
                            }}>
                                <button className="next_button" disabled={this.state.button}>Next</button>
                            </Link>
                        </div>
                    </div>
                    <br/>
                    <div className="schedule_session text-center">
                        Morning
                    </div>
                    <br/>
                    <div className="row">
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('9.00 am')}>9.00 am</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('9.30 am')}>9.30 am</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('10.00 am')}>10.00 am</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('10.30 am')}>10.30 am</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('11.00 am')}>11.00 am</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('11.30 am')}>11.30 am</div>
                    </div>
                    <br/>
                    <div className="schedule_session text-center">
                        AfterNoon
                    </div>
                    <br/>
                    <div className="row">
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('12.00 pm')}>12.00 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('12.30 pm')}>12.30 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('1.00 pm')}>1.00 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('1.30 pm')}>1.30 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('2.00pm')}>2.00 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('2.30 pm')}>2.30 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('3.00 pm')}>3.00 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('3.30 pm')}>3.30 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('4.00 pm')}>4.00 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('5.30 pm')}>5.30 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('6.00 pm')}>6.00 pm</div>
                    </div>
                    <br/>
                    <div className="schedule_session text-center">
                        Evening
                    </div>
                    <br/>
                    <div className="row ">
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('5.00 pm')}>5.00 pm</div>
                        <div className="col-md-1 schedule_time" onClick={()=>this.scheduleTime('5.30 pm')}>5.30 pm</div>
                    </div>
                </div>
                <br/><br/>
                <Footer/>
            </div>
        );
    }
}

