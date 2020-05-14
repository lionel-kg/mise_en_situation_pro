import React from 'react';
import axios from 'axios';


class Image extends React.Component{
  constructor(props){
    super(props);
    this.state = {
      image: null
      
    } 
   /* this.onFormSubmit = this.onFormSubmit.bind(this)
    this.onChange = this.onChange.bind(this)
    this.fileUpload = this.fileUpload.bind(this)*/
  }
 
 /* 
  onFormSubmit(e){
    e.preventDefault() // Stop form submit
    this.fileUpload(this.state.image).then((response)=>{
      console.log(response.data);
    })
  }

  fileUpload(image){
    const url = 'http://127.0.0.1:8000/upload';
    const formData = new FormData();
    formData.append('image',image)
    const config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }
    return axios.post(url, formData,config)
  }
*/
    onChange = event => {
      this.setState({
        image: event.target.files[0],
        loaded: 0,
      })
    }
    onClickHandler = () => {
      const data = new FormData() 
      data.append('image', this.state.image)
      axios.post("/image", data, { // receive two parameter endpoint url ,form data 
      })
      .then(res => {
        console.log(res.statusText)
      })
  }

  

  render(){
    const image = this.state.image;
    console.log(image)
    return (
        <form /*/onSubmit={this.onFormSubmit}*/>
              <h1>upload image</h1>
              <input type="file" onChange={this.onChange} />
              <button type="button" onClick={this.onClickHandler}>upload</button>
        </form>
    )
  }
}

export default Image;
