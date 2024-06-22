#build stage
FROM node:20 as build-stage
# Build app
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY ./ .
RUN npm run build

#final stage
FROM nginx:alpine as production-stage
RUN mkdir /app
COPY --from=build-stage /app/dist /app
COPY nginx.conf /etc/nginx/nginx.conf