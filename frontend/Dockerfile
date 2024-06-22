#build stage
FROM node:21 as build-stage

# Build app
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY ./ ./
# COPY . .
RUN npm run build



FROM nginx:stable-alpine as production-stage
COPY --from=build-stage /app/dist /usr/share/nginx/html
COPY nginx.conf /etc/nginx/nginx.conf

