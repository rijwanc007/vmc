import React, { Component } from "react";
import {Link } from "react-router-dom";
import Modal from 'react-awesome-modal';
import Footer from './Footer';

import community_picture from '../../../public/picture/community.png';
import fashion_picture from '../../../public/picture/fashion.png';
import calender_picture from '../../../public/picture/calender.png';
import contact_picture from '../../../public/picture/contacts.png';
import career_picture from '../../../public/picture/careers.png';
import logo from '../../../public/picture/logo-pop-up.png';
import coming_soon from '../../../public/picture/coming.png';

class Home extends Component{
    constructor(props) {
        super(props);
        this.state = {
            visible : false,
            phoneModal :false,
            emailModal:false,
            play:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAYAAAAehFoBAAAABmJLR0QA/wD/AP+gvaeTAAADVUlEQVRYw8WZ3XXiMBBGL5wUoBK8HTgVgCtYUoFNBQkVECogqQBcAVCBvBXAVhBvBasS9mHGG+NjwD8yzBtYGl2PR6NP0gjP5lJrgBDIgcDEUebT/6gnXAjMgIlCGqAOMAScPvsF7E0cubsAawQT4FX/yoADkF2DcKkNgKm+3Ez7fbb9Aq2AXWrfgCVw0sH2XaKkLz1TXzmwMHF08gas0dnpz4XPvCwFYWviaNEb2KU2AdZIRN99gVbGMBoQA0TXUmt0w1EB++J7tl8Yb43Mj+hSioyudC5go6b55Qn66rijC51mwObesKXx35Aq9FxNj3FN40BhXx4BC2Di6AMpe7vqs3FN+w0X6qNLbaif7B62AIxGux5YYcyVamCAjUvt0aV2OiStpsICWGoVOQfWP9fa6JaFgHWp3WkKDQWdAXvlOgdGVp5Ty/I1A44ute/lKHi2FZAU/svAr8Bnl0AgK9VxiPw2cZQDW6Q+C7CqLtNVG6gFSH7bAfL7AMT/gREV1Qe2bFMkvze+8lsDGbjUBgXwT0Sn+rQEzW9P/jIgLIBD6oV37+AgZelLV88+9rsMTNcdQEMLgJ3md9jRRwZMxjpBTgPClm2KpMmmaxkcd+nkwRLgq7rs3rDTI4FB8nutGvh2Y03ZpwcC58h2a9+kcVEin5Dt9z3N0W27FQCMVfNO7wS7BX503BsaIC9yOB9SdSElKTJxNO9RPkPgT5HDJyTKW8+gObAyceTD7wRYFRE+6B++zCGy8NkHrNbsqYmjrIhwhojkuQfYPTL7c48BmKlfqcPqPOupZ09Inr54hgWRlgc4r8OfyAZ029KZQyLatl8z5yIdgsJ/WfxkSLVIWvhbIWVqEFi1pY7DGXAJYNlAmOwV9H1IlaeSNCgH5Ay4bpdasZzh8rQKa5AUnd9sqOcOyZBADYCPTYVRccLz91HQqpdt3bNaean6IkLk312hXWo3yDL8Uvf81vlwCFhkef0YGNTQ4FC7yQl8iCS/A+ZDTDattRvkYufqJGt6x2GQepggC8yHj3KmCnGJLL3zJmK+7S1SiJS8UMG3XSKufl4VtFUAOl0s6ieMdcCc7wvDvO4QXAEDvu/oHJDqCzcC7QVcgZkhEZ8oVFBtggijXF8q6zMP/gE2T50F6nsWVgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAASdEVYdEVYSUY6T3JpZW50YXRpb24AMYRY7O8AAAAASUVORK5CYII=",
            pause:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAYAAAAehFoBAAAABmJLR0QA/wD/AP+gvaeTAAAC5ElEQVRYw9WZ23HbMBBFjzgpACUoFQQdmKjATgWQK1BUgewKFFcgoQLLFUDugKkgLAHpIB9YjGmaL1kP0ndGHxqCiwMQu1gsZpxJwfk5UP0llfIrlDXh1H5mJwAq4A64BfIK2J9a0x+AqrQ5AC/Kmv1VgIPzOWAFdn9M58F5XXkXwAG/j5n5wcDyyTeABh6VNbvPzFBt4GuxtxpqbxBwcP4XsAScsubhFNAW8C1xufzsm+1ZjzElxubAvbKmOCdsra8NsABMVz9ZD6wHQp+Rc0hZswJWwHNwftHWrnGGK7CFsub+kqANfWvp+6ey5lB/3jbDz2PAAsiXNMSZ1r3AwfkHYtxcXRu2Bp2Wh2oFlhEtiQ4WxgIW6B1xk1m3AhPj7NOlHewIrYA7CX1AxelSPFTWfO+zIiFId8yOkXYL4s7WCtQ3OclGsvmt8mwNPA4cuSbmBn2a97RTfQaUNbvg/Do4nytrDpmMQgP61O32gnpEvlRawxaYKizEJGsRnFcJOAdexqZqk0SsPZBnEud0064yMb0CNxnRgaYOC1AAOgEXY9P0SVZAnhFDy7+xgYYqOV0xNshAFQk4jE0yUCE73cZVpatx+CtIfZkZlv0iZMQYfDM20ABpxOlKOlLFCSkHikxZUwKh6fw0Md0Cr2kN7+lOtEeVVJ00cEjAjrd61xS1AHbKmhiH5ZgSugoYI8sSJ/XdEemJeEzaDTBQDOyopDsTDH0GpK5XpvR3VnvogddzF/w+K4m9f6lUgeobxwpYTihibIF99XDxDljW8hOwrVdcri3xJ02tAvVha5blUMroxoLVxKLOh3pxWy5xD8yD81eHrlQvG4sss44XlbxYcqVamyyDDR1XCK3ZmgAa+esv7YhS/toQi+e7tnbH3HGsiQ551K3PANu5gAbilyy72h97i7Qleu7J4Be9RWroaElM9/bEitFhCLwsqzveEq3L3dM1dD6Xzm94u+UMxApNVWe9Cf0PKUM2fVKr8eAAAAAZdEVYdFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAEnRFWHRFWElGOk9yaWVudGF0aW9uADGEWOzvAAAAAElFTkSuQmCC",
        }
    }
    openModal() {
        this.setState({
            visible : true
        });
    }
    closeModal() {
        this.setState({
            visible : false
        });
    }
    phoneOpenModal(){
        this.setState({
            phoneModal:true,
        })
    }
    phoneCloseModal(){
        this.setState({
            phoneModal:false,
        })
    }
    emailOpenModal(){
        this.setState({
            emailModal:true,
        })
    }
    emailCloseModal(){
        this.setState({
            emailModal:false,
        })
    }
    mainVideoControl(){
        if(this.refs.main_video.paused){
            this.refs.main_video.play();
            this.refs.main_video_control.src = this.state.pause;
        }else{
            this.refs.main_video.pause();
            this.refs.main_video_control.src = this.state.play;
        }
    }
    mainVideoMouseEnter(){
        this.refs.main_video_control.style.display = 'block';
    }
    mainVideoMouseLeave(){
        this.refs.main_video_control.style.display = 'none';
    }
    contactVideoControl(){
        if(this.refs.contact_video.paused){
            this.refs.contact_video.play();
            this.refs.contact_video_control.src = this.state.pause;
        }else{
            this.refs.contact_video.pause();
            this.refs.contact_video_control.src = this.state.play;
        }
    }
    contactVideoMouseEnter(){
        this.refs.contact_video_control.style.display = 'block';
    }
    contactVideoMouseLeave(){
        this.refs.contact_video_control.style.display = 'none';
    }
    render(){
        return (
            <div style={{backgroundColor:'#000100'}}>
                <Modal visible={this.state.visible} width="500" height="350" effect="fadeInUp" onClickAway={() => this.closeModal()}>
                    <div className="modal_design">
                        <img className="coming_soon" src={coming_soon} alt="coming_soon"/>
                        <a className="close_button" href="javascript:void(0);" onClick={() => this.closeModal()}>Close</a>
                    </div>
                </Modal>
                <Modal visible={this.state.phoneModal} width="500" height="350" effect="fadeInUp" onClickAway={() => this.phoneCloseModal()}>
                    <div>
                        <div className="form_design">
                            <form>
                                <div className="margin_setting">
                                    <div className="contact_me_text">if you have any kind of curiosity feel free and contact me</div>
                                    <input type="text" className="input_field_design" id="name" name="name" placeholder="Message"/>
                                    <input type="text" className="input_field_design" id="mobile" name="mobile" placeholder="Type Your Mobile Number"/>
                                </div>
                                <input type="submit" className="submit_button" onClick={()=>this.phoneCloseModal()} value="Submit"/>
                                <input type="button" className="close_button_two" onClick={()=>this.phoneCloseModal()} value="close"/>
                            </form>
                        </div>
                    </div>
                </Modal>
                <Modal visible={this.state.emailModal} width="500" height="350" effect="fadeInUp" onClickAway={() => this.emailCloseModal()}>
                    <div>
                        <div className="form_design">
                            <form>
                                <div className="margin_setting">
                                    <div className="contact_me_text">if you have any kind of curiosity feel free and contact me</div>
                                    <input type="text" className="input_field_design" id="name" name="name" placeholder="Message"/>
                                    <input type="text" className="input_field_design" id="mobile" name="mobile" placeholder="Type Your Valid Email Id"/>
                                </div>
                                <input type="submit" className="submit_button" onClick={()=>this.emailCloseModal()} value="Submit"/>
                                <input type="button" className="close_button_two" onClick={()=>this.emailCloseModal()} value="close"/>
                            </form>
                        </div>
                    </div>
                </Modal>
                <section id="home">
                    <img src={logo} className="logo img-responsive" alt="logo"/>
                    {/*<a href="/login"><button>Log in</button></a>*/}
                    <div className="home_video">
                        <div className="video_player_with_icon">
                            <video ref="main_video" className="video_player_design">
                                <source src={`/video/home_page_tv_one.mp4`} type="video/mp4"/>
                            </video>
                        </div>
                        <div className="tv_cursor" onClick={()=>this.mainVideoControl()} onMouseEnter={()=>this.mainVideoMouseEnter()} onMouseLeave={()=>this.mainVideoMouseLeave()}>.</div>
                        <a href="#community_consult_service"><img src={community_picture} className="fashionDesign img-responsive" alt="community"/></a>
                        <a href="#fashion_service"><img src={fashion_picture} className="communityDesign img-responsive" alt="fashion"/></a>
                        {/*<Link to="/calendar"><img src={calender_picture} className="calender img-responsive" alt="calender"/></Link>*/}
                        <a href="https://squareup.com/appointments/book/anv5faybitn30s/7EYJ1N3708MNM/date" target="_blank"><img src={calender_picture} className="calender img-responsive" alt="calender"/></a>
                        <Link to="/career"><img src={career_picture} className="career img-responsive" alt="career"/></Link>
                        <a href="#contact_us"><img src={contact_picture} className="contact img-responsive" alt="contact"/></a>
                        <img ref="main_video_control" src={this.state.play} className="play_btn_1 img-responsive" alt="play-btn" onClick={()=>this.mainVideoControl()} onMouseEnter={()=>this.mainVideoMouseEnter()} onMouseLeave={()=>this.mainVideoMouseLeave()}/>
                    </div>
                </section>
                <section id="community_consult_service" className="community_consultant_service">
                        <div className="technology_training_life_development" onClick={()=>this.openModal()}>
                            <img className="technology_training_life_development_img" src={`/picture/technology-&-life-development.png`} alt="technology-&-life-development"/>
                        </div>
                        <div className="administrative_executive_relation" onClick={()=>this.openModal()}>
                            <img className="administrative_executive_relation_img" src={`/picture/administrative-&-executive-relation.png`} alt="administrative-&-executive-relation"/>
                        </div>
                        <div className="airbnb_concierge">
                            <img className="airbnb_concierge_icon img-responsive" data-toggle="tooltip" data-placement="top" title="Do you own a vacation rental and need someone to clean? -Traveling off island and need someone to check on your rental?" src={`/picture/airbnb.png`} alt="airbnb.png"/>
                        </div>
                        <div className="turo_concierge" onClick={()=>this.openModal()}>
                            <img className="turo_concierge_img" src={`/picture/turo.png`} alt="turo"/>
                        </div>
                        <div className="community_consultant_services_career" onClick={()=>this.openModal()}>
                            <img className="community_consultant_services_career_img" src={`/picture/community-consultant-service.png`} alt="community-consultant-service"/>
                        </div>
                        <div className="visual_merchandising">
                            <img className="visual_merchandising_img" data-toggle="tooltip_two" data-placement="top" title="Need some assistance with improving your store’s appear? -Do you have graphics that need to be installed?" src={`/picture/visual-merchandising.png`} alt="visual-merchandising"/>
                        </div>
                        {/*<div className="container-fluid" style={{marginLeft:'2%'}}>*/}
                        {/*    <div className="row">*/}
                        {/*        <div className="col-md-11">*/}
                        {/*            <img className="img-fluid" src={`/picture/community_consult_service.png`} alt="community_consult_service"/>*/}
                        {/*        </div>*/}
                        {/*    </div>*/}
                        {/*</div>*/}
                        <div className="home_video">
                            <img className="img-fluid" src={`/picture/community_consult_service.png`} alt="community_consult_service"/>
                        </div>
                </section>
                <br/><br/>
                <section id="fashion_service" className="fashion_service">
                    <Link to="/fashion_tex_social_media">
                        <div className="fashion_tex_social_media">
                            <img className="fashion_tex_social_media_img" src={`/picture/Fashion-tex-Social-media.png`} alt="Fashion-tex-Social-media"/>
                        </div>
                    </Link>
                    <Link to="/fashion_tex">
                        <div className="fashion_tex_style">
                            <img className="fashion_tex_style_img" src={`/picture/fasion-tex-style.png`} alt="fashion"/>
                        </div>
                    </Link>
                    <Link to="/fashion_tex_style">
                        <div className="fashion_tex_sales">
                            <img className="fashion_tex_sales_img" src={`/picture/fasion-tex-sales.png`} alt="fashion-tex-sales"/>
                        </div>
                    </Link>
                        <div className="operation_management_system" onClick={()=>this.openModal()}>
                            <img className="operation_management_system_img" src={`/picture/operation-&-money-management.png`} alt="operation-&-money-management"/>
                        </div>
                    {/*<div className="container-fluid" style={{marginLeft:'2%'}}>*/}
                    {/*    <div className="row">*/}
                    {/*        <div className="col-md-11">*/}
                    {/*            <img className="img-fluid" src={`/picture/fashion_service.png`} alt="fashion_service"/>*/}
                    {/*        </div>*/}
                    {/*    </div>*/}
                    {/*</div>*/}
                        <div className="home_video">
                            <img className="img-fluid" src={`/picture/fashion_service.png`} alt="fashion_service"/>
                        </div>
                </section>
                <section id="contact_us" className="contact_us">
                    <div className="text_me" onClick={()=>this.phoneOpenModal()}>
                    </div>
                    <a href="#home">
                    <div className="contact_home">
                    </div>
                    </a>
                    <div className="email_me" onClick={()=>this.emailOpenModal()}>
                    </div>
                    <div className="home_video">
                    <div className="video_player_with_icon">
                        <video ref="contact_video" className="contact_video_player_design">
                            <source src={`/video/contact_form_one.mp4`} type="video/mp4"/>
                        </video>
                        <div className="mobile_cursor"  onClick={()=>this.contactVideoControl()} onMouseEnter={()=>this.contactVideoMouseEnter()} onMouseLeave={()=>this.contactVideoMouseLeave()}>.</div>
                    </div>
                    <img ref="contact_video_control" src={this.state.play} className="play_btn_2 img-responsive" alt="play-btn"  onClick={()=>this.contactVideoControl()} onMouseEnter={()=>this.contactVideoMouseEnter()} onMouseLeave={()=>this.contactVideoMouseLeave()}/>
                    </div>
                </section>
                <Footer/>
            </div>
        )
    }
}
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="tooltip_two"]').tooltip();
});
export default Home;
