import Link from "next/link";
import useSWR from "swr";

import fetcher from "lib/fetcher";
import { Views } from "lib/types";
import type { Project } from ".contentlayer/types";

export default function ProjectPost({
  title,
  summary,
  slug,
}: Pick<Project, "title" | "summary" | "slug">) {
  const { data } = useSWR<Views>(`/api/views/${slug}`, fetcher);
  const views = data?.total;

  return (
    <Link href={`/projects/${slug}`}>
      <a className="w-full">
        <div className="w-full mb-8">
          <div className="flex flex-col justify-between md:flex-row">
            <h4 className="w-full mb-2 text-lg font-medium md:text-xl">
              {title}
            </h4>
            <p className="w-32 mb-4 text-left md:text-right md:mb-0">
              {`${views ? new Number(views).toLocaleString() : "–––"} views`}
            </p>
          </div>
          <p className="">{summary}</p>
        </div>
      </a>
    </Link>
  );
}
