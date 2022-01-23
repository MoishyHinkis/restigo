import React from 'react'
import axios from "axios";

export default class Supllier extends React.Component {

    constructor(supllier) {
        super(supllier)
        this.supllier = supllier
        this.state = {
            svg: null
        }
    }

    render() {
        return <div
            className={`text-center border border-2 border-blue-400 bg-blue-100
        ${this.supllier.current ? 'bg-red-100' : ''}
         hover:bg-blue-700 p-2`}>
            {this.supllier.supllier.name}
            <img src={this.supllier.supllier.logo} alt={`${this.supllier.supllier.name} logo`} width={'50px'} />
        </div>
    }
}