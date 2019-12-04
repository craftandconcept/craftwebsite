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

export function getTeams () {
  return axios.get(`${apiUrl}/api/teams`)
    .then(res => res.data.teams)
}

export function getCreators () {
  return axios.get(`${apiUrl}/api/creators`)
    .then(res => res.data.creators)
}

export function getCollaborators () {
  return axios.get(`${apiUrl}/api/collaborators`)
    .then(res => res.data.collaborator)
}
