import axios from 'axios';
import { getToken, setToken } from '@/utils/auth';

import Swal from 'sweetalert2'

// Create axios instance
const service = axios.create({
  baseURL: process.env.MIX_BASE_API,
  timeout: 10000, // Request timeout
});

// Request intercepter
service.interceptors.request.use(
  config => {
    const token = getToken();
    if (token) {
      config.headers['Authorization'] = 'Bearer ' + getToken(); // Set JWT token
    }
    return config;
  },
  error => {
    // Do something with request error
    console.log(error); // for debug
    Promise.reject(error);
  }
);

// response pre-processing
service.interceptors.response.use(
  response => {
    if (response.headers.authorization) {
      setToken(response.headers.authorization);
      response.data.token = response.headers.authorization;
    }

    if(response.data.message){
    const message = response.data.message ? response.data.message : "Added Successfully";

    Swal.fire({
      title: 'Success!',
      text: message,
      icon: 'success',
      showConfirmButton: false
    });

    }

    return response.data;
  },
  error => {
    let message = error.message;

    if (error.response.data && error.response.data.errors) {

      message = error.response.data.errors;

      var errorValue = ''

      for(var i in message){

        errorValue = message[i]

      }

      Swal.fire({
        title: 'Error!',
        text: errorValue,
        icon: 'error',
        showConfirmButton: false
      });


    } else if (error.response.data && error.response.data.error) {
      message = error.response.data.error;

      if(message == 'invalid_grant'){

       Swal.fire({
            title: 'Error!',
            text: "Invalid username or password",
            icon: 'error',
            showConfirmButton: false
          });

      }

    } else if (error.response.data.message){
      message = error.response.data.message;
    }
  },
);

export default service;
