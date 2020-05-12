import React from 'react';


class Image extends React.Component{
    fileSelectedHandler = event => {
      console.log(event.target.value);
    }


  render(){
    return (
        <div className='image'>
              <input type="file" name="image" onChange={this.fileSelectedHandler}/>
        </div>
    );
  }
}

export default Image;
