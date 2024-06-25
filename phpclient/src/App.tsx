import React from 'react';
import axios from 'axios';

const App = () => {
  const endpoint = 'http://localhost/another_php_class/signUp.php';
  const [firstName, setFirstName] = React.useState('');
  const [lastName, setLastName] = React.useState('');
  const [email, setEmail] = React.useState('');
  const [password, setPassword] = React.useState('');

  const handleSubmit = async () => {
    const payload = {
      firstName,
      lastName,
      email,
      password
    
    }

    const response = await axios.post(endpoint, payload, {
      headers:{
        'Access-Control-Allow-Origin': '*',
        'Content-Type': 'application/json',
      }
    });
    console.log(response.data);
  }
  return (
    
    <>
      <div className='col-11 col-md-8 col-lg-6 mx-auto mt-5 p-3 border border-dark shadow-lg'> 
        <h6 className='display-6 text-center text-muted'>Sign Up Page</h6>
        <input type="text" placeholder='First name' onChange={(e)=>setFirstName(e.target.value)} className='form-control w-100 mb-3'/>
        <input type="text" placeholder='Last name' onChange={(e)=>setLastName(e.target.value)} className='form-control w-100 mb-3'/>
        <input type="text" placeholder='Email' onChange={(e)=>setEmail(e.target.value)} className='form-control w-100 mb-3'/>
        <input type="text" placeholder='Password' onChange={(e)=>setPassword(e.target.value)} className='form-control w-100 mb-3'/>
        <button onClick={handleSubmit}>Submit</button>
      </div>
    </>
  )
}

export default App;