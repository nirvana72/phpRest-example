const request = axios.create({
  baseURL: 'http://phprest.nijia.online',
  timeout: 60000
})

request.interceptors.request.use(
  config => {
    config.headers['Authorization'] = '123123'
    return config
  },
  error => {
    console.log(error)
  }
)

request.interceptors.response.use(
  response => {
    console.log(response.data)
  },
  error => { // 非200状态
    console.log(error)
  }
)