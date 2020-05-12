import React from 'react';
import Profil from './Profil';
import './App.css';

function App() {

  fetch('http://127.0.0.1:8000/api/users')
  .then(response => response.json())
  .then(result =>{
      console.log(result);
  });

  return (
    <div className="App">
      <Profil></Profil>
    </div>
  );
}

export default App;
