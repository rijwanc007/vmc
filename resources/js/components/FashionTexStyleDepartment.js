import React from 'react';
import Footer from './Footer'
import {Link} from "react-router-dom";

class FashionTexStyleDepartment extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            imageVideo : [],
            visible : false,
            phoneModal :false,
            emailModal:false,
            play:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAYAAAAehFoBAAAABmJLR0QA/wD/AP+gvaeTAAADVUlEQVRYw8WZ3XXiMBBGL5wUoBK8HTgVgCtYUoFNBQkVECogqQBcAVCBvBXAVhBvBasS9mHGG+NjwD8yzBtYGl2PR6NP0gjP5lJrgBDIgcDEUebT/6gnXAjMgIlCGqAOMAScPvsF7E0cubsAawQT4FX/yoADkF2DcKkNgKm+3Ez7fbb9Aq2AXWrfgCVw0sH2XaKkLz1TXzmwMHF08gas0dnpz4XPvCwFYWviaNEb2KU2AdZIRN99gVbGMBoQA0TXUmt0w1EB++J7tl8Yb43Mj+hSioyudC5go6b55Qn66rijC51mwObesKXx35Aq9FxNj3FN40BhXx4BC2Di6AMpe7vqs3FN+w0X6qNLbaif7B62AIxGux5YYcyVamCAjUvt0aV2OiStpsICWGoVOQfWP9fa6JaFgHWp3WkKDQWdAXvlOgdGVp5Ty/I1A44ute/lKHi2FZAU/svAr8Bnl0AgK9VxiPw2cZQDW6Q+C7CqLtNVG6gFSH7bAfL7AMT/gREV1Qe2bFMkvze+8lsDGbjUBgXwT0Sn+rQEzW9P/jIgLIBD6oV37+AgZelLV88+9rsMTNcdQEMLgJ3md9jRRwZMxjpBTgPClm2KpMmmaxkcd+nkwRLgq7rs3rDTI4FB8nutGvh2Y03ZpwcC58h2a9+kcVEin5Dt9z3N0W27FQCMVfNO7wS7BX503BsaIC9yOB9SdSElKTJxNO9RPkPgT5HDJyTKW8+gObAyceTD7wRYFRE+6B++zCGy8NkHrNbsqYmjrIhwhojkuQfYPTL7c48BmKlfqcPqPOupZ09Inr54hgWRlgc4r8OfyAZ029KZQyLatl8z5yIdgsJ/WfxkSLVIWvhbIWVqEFi1pY7DGXAJYNlAmOwV9H1IlaeSNCgH5Ay4bpdasZzh8rQKa5AUnd9sqOcOyZBADYCPTYVRccLz91HQqpdt3bNaean6IkLk312hXWo3yDL8Uvf81vlwCFhkef0YGNTQ4FC7yQl8iCS/A+ZDTDattRvkYufqJGt6x2GQepggC8yHj3KmCnGJLL3zJmK+7S1SiJS8UMG3XSKufl4VtFUAOl0s6ieMdcCc7wvDvO4QXAEDvu/oHJDqCzcC7QVcgZkhEZ8oVFBtggijXF8q6zMP/gE2T50F6nsWVgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAASdEVYdEVYSUY6T3JpZW50YXRpb24AMYRY7O8AAAAASUVORK5CYII=",
            pause:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAYAAAAehFoBAAAABmJLR0QA/wD/AP+gvaeTAAAC5ElEQVRYw9WZ23HbMBBFjzgpACUoFQQdmKjATgWQK1BUgewKFFcgoQLLFUDugKkgLAHpIB9YjGmaL1kP0ndGHxqCiwMQu1gsZpxJwfk5UP0llfIrlDXh1H5mJwAq4A64BfIK2J9a0x+AqrQ5AC/Kmv1VgIPzOWAFdn9M58F5XXkXwAG/j5n5wcDyyTeABh6VNbvPzFBt4GuxtxpqbxBwcP4XsAScsubhFNAW8C1xufzsm+1ZjzElxubAvbKmOCdsra8NsABMVz9ZD6wHQp+Rc0hZswJWwHNwftHWrnGGK7CFsub+kqANfWvp+6ey5lB/3jbDz2PAAsiXNMSZ1r3AwfkHYtxcXRu2Bp2Wh2oFlhEtiQ4WxgIW6B1xk1m3AhPj7NOlHewIrYA7CX1AxelSPFTWfO+zIiFId8yOkXYL4s7WCtQ3OclGsvmt8mwNPA4cuSbmBn2a97RTfQaUNbvg/Do4nytrDpmMQgP61O32gnpEvlRawxaYKizEJGsRnFcJOAdexqZqk0SsPZBnEud0064yMb0CNxnRgaYOC1AAOgEXY9P0SVZAnhFDy7+xgYYqOV0xNshAFQk4jE0yUCE73cZVpatx+CtIfZkZlv0iZMQYfDM20ABpxOlKOlLFCSkHikxZUwKh6fw0Md0Cr2kN7+lOtEeVVJ00cEjAjrd61xS1AHbKmhiH5ZgSugoYI8sSJ/XdEemJeEzaDTBQDOyopDsTDH0GpK5XpvR3VnvogddzF/w+K4m9f6lUgeobxwpYTihibIF99XDxDljW8hOwrVdcri3xJ02tAvVha5blUMroxoLVxKLOh3pxWy5xD8yD81eHrlQvG4sss44XlbxYcqVamyyDDR1XCK3ZmgAa+esv7YhS/toQi+e7tnbH3HGsiQ551K3PANu5gAbilyy72h97i7Qleu7J4Be9RWroaElM9/bEitFhCLwsqzveEq3L3dM1dD6Xzm94u+UMxApNVWe9Cf0PKUM2fVKr8eAAAAAZdEVYdFNvZnR3YXJlAEFkb2JlIEltYWdlUmVhZHlxyWU8AAAAEnRFWHRFWElGOk9yaWVudGF0aW9uADGEWOzvAAAAAElFTkSuQmCC",
        }
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
    render(){
        return(
            <div style={{backgroundColor:'#000100'}}>
                <div className="home_video">
                    <div className="video_player_with_icon">
                        <video ref="main_video" className="video_player_design">
                            <source src={`/video/home_page_tv_two.mp4`} type="video/mp4"/>
                        </video>
                    </div>
                    <a href="#"><img src={`/picture/dream_color_btn.png`} className="dream_color_collection img-responsive" alt="community"/></a>
                    <a href="#"><img src={`/picture/thailand_btn.png`} className="thailand_collection img-responsive" alt="fashion"/></a>
                    <div className="tv_cursor" onClick={()=>this.mainVideoControl()} onMouseEnter={()=>this.mainVideoMouseEnter()} onMouseLeave={()=>this.mainVideoMouseLeave()}>.</div>
                    <img src={`/picture/men-btn.png`} className="male img-responsive" alt="men-btn"/>
                    <img src={`/picture/women-btn.png`} className="female img-responsive" alt="women-btn"/>
                    {/*<img src={`/picture/background.png`} className="contact img-responsive" alt="background"/>*/}
                    <img ref="main_video_control" src={this.state.play} className="play_btn_1 img-responsive" alt="play-btn" onClick={()=>this.mainVideoControl()} onMouseEnter={()=>this.mainVideoMouseEnter()} onMouseLeave={()=>this.mainVideoMouseLeave()}/>
                </div>
                <Footer/>
            </div>
        )
    }
}
export default FashionTexStyleDepartment;