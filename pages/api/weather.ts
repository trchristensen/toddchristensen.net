import type { NextApiRequest, NextApiResponse } from "next";
import { convertToF } from "lib/utils";
import { env } from "config/env.config";

const getTheWeather = async (city: string, countryCode: string) => {
  const response = await fetch(
    `https://openweathermap.org/data/2.5/weather?q=${city},${countryCode}&appid=${env.OPENWEATHER_API_KEY}`
  );
  return response.json();
};

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse
) {
  const city = req.query.city;
  const countryCode = req.query.country_code;

  const response = await getTheWeather(`${city}`, `${countryCode}`);

  if (!response.weather) {
    return res.status(200);
  }

  const temp = response.main.temp;
  const temp_f = convertToF(temp);
  const id = response.weather[0].id;
  const main = response.weather[0].main;
  const description = response.weather[0].description;
  const icon = response.weather[0].icon;

  return res.status(200).json({
    temp,
    temp_f,
    id,
    main,
    description,
    icon,
  });
}
