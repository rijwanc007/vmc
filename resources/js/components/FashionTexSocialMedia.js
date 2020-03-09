import React,{ Component } from 'react';
import Footer from './Footer';

export default class FashionTexSocialMedia extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return(
            <div>
                <a href="https://www.instagram.com/visualmisconception/" target="_blank"><div className="div_insta">.</div></a>
                <a href="https://www.facebook.com/Visual-Misconception-773635376157885/?ref=bookmarks" target="_blank"><div className="div_facebook">.</div></a>
                <a href="https://www.snapchat.com/add/visualmisc" target="_blank"><div className="div_snapchat">.</div></a>
                <a href="https://lookbook.nu/visualmisconception" target="_blank"><div className="div_lb">.</div></a>
                <a href="https://open.spotify.com/user/24g9hfb2rhfefg4pcdg4c9ln7?si=g9msM_fyRWGXI-V-KBHLig&nd=1" target="_blank"><div className="div_green">.</div></a>
                <a href="http://vm.tiktok.com/RTcqCG/" target="_blank"><div className="div_music">.</div></a>
                <a href="https://www.pinterest.com/visualmisc/" target="_blank"><div className="div_p">.</div></a>
              <img style={{width:'1425px'}} src={`/picture/fashion_tex_social_media.png`} alt="fashion_tex_social_media"/>
            <Footer/>
            </div>
        )
    }
}