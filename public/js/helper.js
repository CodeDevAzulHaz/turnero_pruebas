  let axios_headers = {
    "Accept":         "application/json, text/javascript, */*; q=0.01", // dataType
    "Content-Type":   "application/json; charset=UTF-8", // contentType
    // "Content-Type":   "application/x-www-form-urlencoded", // contentType
  };

  const Turnero = axios.create({
    baseURL: 'http://localhost/turnero_pruebas',
    headers: axios_headers,
  });