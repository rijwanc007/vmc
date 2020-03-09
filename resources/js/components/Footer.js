import React,{ Component} from 'react';
import facebook from "../../../public/picture/fb-pink-1.png";
import insta from "../../../public/picture/insta-pink-1.png";
import lookbook from "../../../public/picture/lookbook-pink1.png";
import snapchat from "../../../public/picture/snapchat-pink-1.png";
import pintrst from "../../../public/picture/pintrst-pink-1.png";

export default class Footer extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return(
            <div>
                <section id="footer">
                    <div className="row">
                        <div className="col-md-12 text-center">
                            <div>
                                <a href="https://www.facebook.com/Visual-Misconception-773635376157885/?ref=bookmarks" target="_blank"><img className="facebook" src={facebook} alt="facebook"/></a>
                                <a href="https://www.instagram.com/visualmisconception/" target="_blank"><img className="insta" src={insta} alt="insta"/></a>
                                <a href="https://lookbook.nu/visualmisconception" target="_blank"><img className="lookbook" src={lookbook} alt="lookbook"/></a>
                                <a href="https://www.snapchat.com/add/visualmisc" target="_blank"><img className="snapchat" src={snapchat} alt="snapchat"/></a>
                                <a href="https://www.pinterest.com/visualmisc/" target="_blank"><img className="pintrst" src={pintrst} alt="pintrst"/></a>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div className="row">
                        <div className="col-md-12 text-center">
                            <a href="http://setcolbd.com" target="_blank"><img src={`/picture/footer_credit.png`} style={{height:'40px'}} alt="footer_credit"/></a>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-md-12 text-center">
                            <span style={{fontFamily:'cursive',color:'#666666'}}>@ Developed by <span><a style={{textDecoration:'none',fontFamily:'cursive',color:'#41aae1'}} href="http://setcolbd.com" target="_blank">SETCOLBD</a></span></span>
                        </div>
                    </div>
                </section>
            </div>
        )
    }
}