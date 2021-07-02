USE [RAMEX]
GO

/****** Object:  Table [dbo].[pbcatfmt]    Script Date: 28/12/2020 10:55:31 ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[pbcatfmt](
	[pbf_name] [varchar](30) NOT NULL,
	[pbf_frmt] [varchar](254) NOT NULL,
	[pbf_type] [smallint] NOT NULL,
	[pbf_cntr] [int] NULL
) ON [PRIMARY]
GO
