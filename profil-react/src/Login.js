import React, { Component } from 'react'

class Login extends Component {

    constructor(props){
        super(props);
        let loggedIn = false
        this.state = {
            email:'',
            password:'',
            loggedIn
        }
        this.onChange = this.onChange.bind(this)
        this.submitForm = this.submitForm.bind(this)
    }
    onChange(e){
            this.setState({
                [e.target.name]: e.target.value
            })
        }

    submitForm(e){
        e.preventDefault()
        const {email , password} = this.state
        //login magic
        console.log(email, password)
    }

    render() {
        return (
            <div>
                <form onSubmit={this.submitForm}>
                    <input type='email' placeholder='saisir votre email' name='email' value={this.state.email} onChange={this.onChange}/>
                    <br/>
                    <input type='password' placeholder='********' name='password' value={this.state.password} onChange={this.onChange}/>
                    <br/>
                    <input type='submit'/>
                </form>
            </div>
        )
    }
}

export default Login;