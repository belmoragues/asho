// import ApiRoutes from './ApiRoutes'

export default ($axios) => ({
  fetchGenderData(params) {
    console.log($axios.get('http://127.0.0.1:8000/gender-data', { params }))
    return $axios.get('http://127.0.0.1:8000/gender-data', { params })
  },
})

export const fetchGenderData = ($axios, params) => {
  return $axios.get('http://127.0.0.1:8000/gender-data', { params })
}
