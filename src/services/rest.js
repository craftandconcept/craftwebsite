import axios from 'axios'
import { apiUrl } from '@/config'

export function getProjects () {
  return axios.get(`${apiUrl}/api/v1`)
    .then(res => res.data.data)
}

export function getCategories () {
  return axios.get(`${apiUrl}/api/categories`)
    .then(res => res.data.categories)
}
