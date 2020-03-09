import React,{ Component } from 'react';
import Footer from './Footer';


export default class FashionTexSales extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return(
            <div>
                <a href="https://posh.mk/1iuK9yiiNY" target="_blank"><div className="div_poshmark">.</div></a>
                <a href="https://www.depop.com/visualmisc/" target="_blank"><div className="div_depop">.</div></a>
                <a href="https://www.vinted.com/members/12605226-alexiusdorsey" target="_blank"><div className="div_vinted">.</div></a>
                <a href="https://www.grailed.com/visualmisc" target="_blank"><div className="div_grailed">.</div></a>
                <a href="https://www.ebay.com/usr/alexiudorse-0?_trksid=p2047675.l2559" target="_blank"><div className="div_eBay">.</div></a>
                <a href="https://www.mercari.com/u/395721564" target="_blank"><div className="div_mercari">.</div></a>
            <img style={{width:'1425px'}} src={`/picture/fashion_tex_sales.png`} alt="fashion_tex_sales"/>
            <Footer/>
            </div>
        )
    }
}