import CurrentTime from "components/CurrentTime/CurrentTime.component";
import CurrentWeather from "components/CurrentWeather/CurrentWeather.component";
import NowPlaying from "components/Spotify/NowPlaying.component";
import Link from "next/link";
import { locale } from "config/locale.config";
import { site } from "config/site.config";
import useSound from "use-sound";
const { TIMEZONE, CURRENT_CITY, CURRENT_COUNTRY_CODE } = locale;
import { useSoundContext } from "components/Providers/Index"; 

const ExternalLink = ({ href, children, onClick }) => {
  
  return(
  <a
    onClick={onClick}
    className="link-hover hover:text-accent-focus transition ease-in-out duration-500"
    target="_blank"
    rel="noopener noreferrer"
    href={href}
  >
    {children}
  </a>
  )
}



export default function Footer() {

    const { playClick } = useSoundContext();

    // const [playActive] = useSound("/sounds/start.mp3", { volume: 0.25 });
  

  return (
    <footer className="flex flex-col justify-center items-start max-w-2xl mx-auto w-full pb-8">
      <hr className="w-full border-1 border-base-300 mb-8" />
      <NowPlaying />
      <div className="w-full max-w-2xl grid grid-cols-1 grid-rows-1 gap-4 pb-16 sm:grid-flow-col sm:grid-cols-3 sm:grid-rows-3">
        {site.footerMenu.map((link, idx) => {
          idx++;
          return link.external_link ? (
            <ExternalLink
              key={idx}
              href={link.path}
              onClick={() => playClick()}
            >
              {link.title}
            </ExternalLink>
          ) : (
            <Link key={idx} href={link.path}>
              <a
                onClick={() => playClick()}
                className="link-hover hover:text-accent-focus transition ease-in-out duration-500"
              >
                {link.title}
              </a>
            </Link>
          );
        })}
      </div>
      <LocaleBar />
    </footer>
  );
}

const LocaleBar = () => (
  <div
    id="Footer__lower"
    className="w-full flex flex-wrap flex-col-reverse items-start sm:items-center sm:justify-between sm:flex-row"
  >
    <CurrentTime
      timezone={TIMEZONE}
      city={CURRENT_CITY}
      countryCode={CURRENT_COUNTRY_CODE}
    />
    <CurrentWeather
      city={CURRENT_CITY}
      countryCode={CURRENT_COUNTRY_CODE}
      timezone={TIMEZONE}
    />
  </div>
);
